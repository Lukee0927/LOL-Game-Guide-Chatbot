<?php
// ============================================================
//  League Mentor AI — Admin / CRUD Panel (admin.php)
//  Full Create, Read, Update, Delete for chatbot_knowledge.
//  Uses PDO prepared statements (no raw SQL injection risk).
// ============================================================

require_once __DIR__ . '/config/db.php';

$pdo = getDBConnection();

// ── Flash message helper ─────────────────────────────────
$flash = '';
$flashType = 'success';
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $flashType = $_SESSION['flash_type'] ?? 'success';
    unset($_SESSION['flash'], $_SESSION['flash_type']);
}

// ── Unique categories for filter dropdown ────────────────
$categories = $pdo->query("SELECT DISTINCT category FROM chatbot_knowledge ORDER BY category ASC")
                  ->fetchAll(PDO::FETCH_COLUMN);

// ── Handle DELETE ────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $delId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($delId) {
        $stmt = $pdo->prepare("DELETE FROM chatbot_knowledge WHERE id = :id");
        $stmt->execute([':id' => $delId]);
        header('Location: admin.php?msg=deleted');
        exit;
    }
}

// ── Handle CREATE / UPDATE ───────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId       = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $keyword      = trim($_POST['keyword']  ?? '');
    $response_txt = trim($_POST['response'] ?? '');
    $category     = trim($_POST['category'] ?? 'General');

    if ($keyword !== '' && $response_txt !== '') {
        if ($postId) {
            // UPDATE
            $stmt = $pdo->prepare(
                "UPDATE chatbot_knowledge
                    SET keyword = :kw, response = :resp, category = :cat
                  WHERE id = :id"
            );
            $stmt->execute([
                ':kw'   => mb_strtolower($keyword),
                ':resp' => $response_txt,
                ':cat'  => $category,
                ':id'   => $postId,
            ]);
            $notice = 'updated';
        } else {
            // CREATE
            $stmt = $pdo->prepare(
                "INSERT INTO chatbot_knowledge (keyword, response, category)
                 VALUES (:kw, :resp, :cat)"
            );
            $stmt->execute([
                ':kw'   => mb_strtolower($keyword),
                ':resp' => $response_txt,
                ':cat'  => $category,
            ]);
            $notice = 'created';
        }
        header("Location: admin.php?msg={$notice}");
        exit;
    }
}

// ── READ SINGLE (pre-fill edit form) ────────────────────
$editRow = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'edit') {
    $editId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($editId) {
        $stmt = $pdo->prepare("SELECT * FROM chatbot_knowledge WHERE id = :id");
        $stmt->execute([':id' => $editId]);
        $editRow = $stmt->fetch();
    }
}

// ── READ ALL (with optional search/filter) ───────────────
$search   = trim($_GET['search']   ?? '');
$filterCat = trim($_GET['category'] ?? '');
$page_num  = max(1, (int) ($_GET['p'] ?? 1));
$per_page  = 15;
$offset    = ($page_num - 1) * $per_page;

$where  = [];
$params = [];

if ($search !== '') {
    $where[]  = "(LOWER(keyword) LIKE :s OR LOWER(response) LIKE :s2)";
    $params[':s']  = '%' . mb_strtolower($search) . '%';
    $params[':s2'] = '%' . mb_strtolower($search) . '%';
}
if ($filterCat !== '') {
    $where[]       = "category = :cat";
    $params[':cat'] = $filterCat;
}

$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

// Total count
$countSQL  = "SELECT COUNT(*) FROM chatbot_knowledge $whereSQL";
$countStmt = $pdo->prepare($countSQL);
$countStmt->execute($params);
$totalRows = (int) $countStmt->fetchColumn();
$totalPages = (int) ceil($totalRows / $per_page);

// Paginated rows
$sql  = "SELECT * FROM chatbot_knowledge $whereSQL ORDER BY id DESC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
foreach ($params as $k => $v) { $stmt->bindValue($k, $v); }
$stmt->bindValue(':limit',  $per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset,   PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll();

// ── Notice banner from redirect ─────────────────────────
$noticeMap = [
    'created' => ['success', '✓ Knowledge record created successfully.'],
    'updated' => ['info',    '✓ Knowledge record updated successfully.'],
    'deleted' => ['warning', '⚠ Knowledge record deleted.'],
];
$noticeMsg  = '';
$noticeType = '';
if (isset($_GET['msg']) && array_key_exists($_GET['msg'], $noticeMap)) {
    [$noticeType, $noticeMsg] = $noticeMap[$_GET['msg']];
}

$pageTitle = 'Admin Panel — League Mentor AI';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">

</head>
<body>

<!-- ── NAVBAR ─────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg lm-nav">
    <div class="container-fluid container-xl">
        <a class="navbar-brand" href="index.php">⚔ League<span>Mentor</span> AI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="guides.php">Guides</a></li>
                <li class="nav-item"><a class="nav-link" href="chatbot.php">Chat</a></li>
                
            </ul>
        </div>
    </div>
</nav>

<!-- ── MAIN WRAP ──────────────────────────────────────────── -->
<div class="admin-wrap">
    <div class="container-xl">

        <!-- Page Header -->
        <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-4">
            <div>
                <p class="page-eyebrow">⚙ Admin Panel</p>
                <h1 class="page-title">Knowledge Base Manager</h1>
                <p class="page-sub">Create, read, update, and delete chatbot question–response records.</p>
            </div>
            <div class="d-flex gap-2 flex-wrap mt-2">
                <div class="stat-pill">
                    <div>
                        <div class="num"><?= number_format($totalRows) ?></div>
                        <div class="lbl">Records</div>
                    </div>
                </div>
                <div class="stat-pill">
                    <div>
                        <div class="num"><?= count($categories) ?></div>
                        <div class="lbl">Categories</div>
                    </div>
                </div>
                <a href="chatbot.php" class="btn-outline">
                    <i class="bi bi-chat-dots"></i> Test Chatbot
                </a>
            </div>
        </div>

        <!-- Notice Banner -->
        <?php if ($noticeMsg): ?>
        <div class="notice-banner notice-<?= $noticeType ?>" role="alert">
            <?= htmlspecialchars($noticeMsg) ?>
        </div>
        <?php endif; ?>

        <div class="row g-4">

            <!-- ── LEFT COLUMN: CREATE / EDIT FORM ─────────── -->
            <div class="col-lg-4">
                <div class="lm-card" id="form-card">
                    <div class="lm-card-title">
                        <i class="bi <?= $editRow ? 'bi-pencil-square' : 'bi-plus-circle' ?>"></i>
                        <?= $editRow ? 'Edit Record' : 'Add New Record' ?>
                    </div>

                    <form method="POST" action="admin.php" id="crud-form" novalidate>
                        <!-- Hidden ID for UPDATE mode -->
                        <input type="hidden" name="id" id="form-id" value="<?= $editRow ? (int)$editRow['id'] : '' ?>">

                        <!-- Keyword -->
                        <div class="mb-3">
                            <label for="f-keyword" class="form-label">Keyword / Trigger Phrase</label>
                            <input
                                type="text"
                                class="form-control lm-control"
                                id="f-keyword"
                                name="keyword"
                                placeholder="e.g. how to ward"
                                maxlength="255"
                                required
                                value="<?= $editRow ? htmlspecialchars($editRow['keyword']) : '' ?>"
                            >
                            <div class="form-text" style="color:var(--text-muted); font-size:.72rem; margin-top:.35rem;">
                                Stored as lowercase. Substring matching is used.
                            </div>
                        </div>

                        <!-- Response -->
                        <div class="mb-3">
                            <label for="f-response" class="form-label">Bot Response</label>
                            <textarea
                                class="form-control lm-control"
                                id="f-response"
                                name="response"
                                placeholder="Enter the full chatbot response..."
                                required
                            ><?= $editRow ? htmlspecialchars($editRow['response']) : '' ?></textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="f-category" class="form-label">Category</label>
                            <select class="form-select lm-control" id="f-category" name="category">
                                <?php
                                $catList = ['Basics','Roles','Champions','Objectives','Runes','Items','Farming','Vision','Team Fighting','Ranked','Advanced','General'];
                                foreach ($catList as $c):
                                    $sel = ($editRow && $editRow['category'] === $c) ? 'selected' : '';
                                ?>
                                <option value="<?= htmlspecialchars($c) ?>" <?= $sel ?>><?= htmlspecialchars($c) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn-gold flex-grow-1">
                                <i class="bi <?= $editRow ? 'bi-save' : 'bi-plus-lg' ?>"></i>
                                <?= $editRow ? 'Update Record' : 'Create Record' ?>
                            </button>
                            <?php if ($editRow): ?>
                            <a href="admin.php" class="btn-outline">
                                <i class="bi bi-x"></i> Cancel
                            </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div><!-- /lm-card -->

                <!-- Quick Tips Card -->
                <div class="lm-card mt-4">
                    <div class="lm-card-title"><i class="bi bi-lightbulb"></i> Tips</div>
                    <ul style="color:var(--text-muted); font-size:.82rem; line-height:1.9; padding-left:1.2rem; margin:0;">
                        <li>Keywords are stored lowercase for best matching.</li>
                        <li>Keep keywords short (2–5 words) for broader matching.</li>
                        <li>Longer, more specific keywords take priority in searches.</li>
                        <li>Test your new keywords in the <a href="chatbot.php" style="color:var(--gold);">chatbot</a>.</li>
                    </ul>
                </div>

            </div><!-- /col -->

            <!-- ── RIGHT COLUMN: RECORDS TABLE ─────────────── -->
            <div class="col-lg-8">
                <div class="lm-card">
                    <div class="lm-card-title">
                        <i class="bi bi-table"></i> All Records
                        <span style="font-size:.7rem; color:var(--text-muted); font-weight:400; margin-left:auto;">
                            Showing <?= count($rows) ?> of <?= $totalRows ?> records
                        </span>
                    </div>

                    <!-- Filter / Search Bar -->
                    <form method="GET" action="admin.php" class="filter-bar" id="filter-form">
                        <input
                            type="text"
                            name="search"
                            class="form-control lm-control flex-grow-1"
                            placeholder="Search keywords or responses…"
                            value="<?= htmlspecialchars($search) ?>"
                            style="min-width:160px;"
                        >
                        <select name="category" class="form-select lm-control" style="width:auto;">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $c): ?>
                            <option value="<?= htmlspecialchars($c) ?>" <?= ($filterCat === $c) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn-gold" style="padding:.5rem 1rem;">
                            <i class="bi bi-search"></i>
                        </button>
                        <?php if ($search || $filterCat): ?>
                        <a href="admin.php" class="btn-outline" style="padding:.5rem .9rem;">
                            <i class="bi bi-x"></i>
                        </a>
                        <?php endif; ?>
                    </form>

                    <!-- Table -->
                    <?php if (count($rows) > 0): ?>
                    <div style="overflow-x:auto;">
                        <table class="lm-table">
                            <thead>
                                <tr>
                                    <th class="td-id">#</th>
                                    <th>Keyword</th>
                                    <th class="td-resp">Response Preview</th>
                                    <th>Category</th>
                                    <th class="td-date">Added</th>
                                    <th class="td-act">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $r): ?>
                                <tr>
                                    <td class="td-id"><?= (int)$r['id'] ?></td>
                                    <td class="td-kw" title="<?= htmlspecialchars($r['keyword']) ?>">
                                        <?= htmlspecialchars($r['keyword']) ?>
                                    </td>
                                    <td class="td-resp" title="<?= htmlspecialchars($r['response']) ?>">
                                        <?= htmlspecialchars(mb_substr($r['response'], 0, 80)) ?>…
                                    </td>
                                    <td><span class="cat-badge"><?= htmlspecialchars($r['category']) ?></span></td>
                                    <td class="td-date">
                                        <?= date('M j, Y', strtotime($r['created_at'])) ?>
                                    </td>
                                    <td class="td-act">
                                        <a
                                            href="admin.php?action=edit&id=<?= (int)$r['id'] ?>#form-card"
                                            class="btn-edit-sm"
                                        >
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <button
                                            class="btn-danger-sm ms-1"
                                            data-id="<?= (int)$r['id'] ?>"
                                            data-kw="<?= htmlspecialchars($r['keyword'], ENT_QUOTES) ?>"
                                            onclick="confirmDelete(this)"
                                        >
                                            <i class="bi bi-trash3"></i> Del
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <?php if ($totalPages > 1): ?>
                    <div class="pagination-wrap">
                        <a href="?p=<?= max(1, $page_num - 1) ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($filterCat) ?>"
                           class="pg-btn <?= $page_num <= 1 ? 'disabled' : '' ?>">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                        <?php for ($pg = 1; $pg <= $totalPages; $pg++): ?>
                        <a href="?p=<?= $pg ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($filterCat) ?>"
                           class="pg-btn <?= $pg === $page_num ? 'active' : '' ?>">
                            <?= $pg ?>
                        </a>
                        <?php endfor; ?>
                        <a href="?p=<?= min($totalPages, $page_num + 1) ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($filterCat) ?>"
                           class="pg-btn <?= $page_num >= $totalPages ? 'disabled' : '' ?>">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php else: ?>
                    <div class="empty-state">
                        <i class="bi bi-inbox" style="color:var(--text-muted);"></i>
                        <p>No records found. Try a different search, or add the first record using the form.</p>
                    </div>
                    <?php endif; ?>

                </div><!-- /lm-card records -->
            </div><!-- /col -->

        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /admin-wrap -->

<!-- ── FOOTER ─────────────────────────────────────────────── -->
<footer class="lm-footer">
    <div class="container">
        <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:.4rem 1.2rem;margin-bottom:.5rem;">
            <a href="index.php" style="font-family:var(--font-display);font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);text-decoration:none;">Home</a>
            <a href="guides.php" style="font-family:var(--font-display);font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);text-decoration:none;">Guides</a>
            <a href="chatbot.php" style="font-family:var(--font-display);font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);text-decoration:none;">Chat</a>
            <a href="credits.php" style="font-family:var(--font-display);font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;color:var(--text-muted);text-decoration:none;">Credits</a>
        </div>
        <p>
            &copy; <?= date('Y') ?> League Mentor AI &nbsp;|&nbsp;
            DIT 2-7 Web Development Final Project
        </p>
    </div>
</footer>

<!-- ── DELETE CONFIRM MODAL ───────────────────────────────── -->
<div class="modal fade lm-modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle me-2" style="color:#f87171;"></i>
                    Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to permanently delete the record for keyword:
                <strong id="del-kw-label" style="color:var(--gold);"></strong>?
                <br><br>
                <span style="color:rgba(248,113,113,.8); font-size:.82rem;">This action cannot be undone.</span>
            </div>
            <div class="modal-footer gap-2">
                <button type="button" class="btn-outline" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Cancel
                </button>
                <a href="#" id="delete-confirm-link" class="btn-danger-sm" style="padding:.55rem 1.2rem; font-size:.72rem;">
                    <i class="bi bi-trash3"></i> Yes, Delete
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ── Delete confirmation ─────────────────────────────────────
function confirmDelete(btn) {
    const id  = btn.dataset.id;
    const kw  = btn.dataset.kw;
    document.getElementById('del-kw-label').textContent = '"' + kw + '"';
    document.getElementById('delete-confirm-link').href = 'admin.php?action=delete&id=' + id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// ── Auto-dismiss notice after 5 seconds ─────────────────────
(function() {
    const notice = document.querySelector('.notice-banner');
    if (notice) {
        setTimeout(() => {
            notice.style.transition = 'opacity .5s';
            notice.style.opacity = '0';
            setTimeout(() => notice.remove(), 500);
        }, 5000);
    }
})();

// ── Scroll to form if in edit mode ──────────────────────────
<?php if ($editRow): ?>
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('form-card');
    if (card) {
        setTimeout(() => card.scrollIntoView({ behavior: 'smooth', block: 'start' }), 200);
    }
});
<?php endif; ?>

// ── Auto-resize response textarea ───────────────────────────
(function() {
    const ta = document.getElementById('f-response');
    if (!ta) return;
    function resize() {
        ta.style.height = 'auto';
        ta.style.height = Math.min(ta.scrollHeight, 220) + 'px';
    }
    ta.addEventListener('input', resize);
    resize();
})();

// ── Live filter table on search input ───────────────────────
(function() {
    const searchInput = document.querySelector('input[name="search"]');
    if (!searchInput) return;
    // Submits automatically on category change
    document.querySelector('select[name="category"]')?.addEventListener('change', () => {
        document.getElementById('filter-form').submit();
    });
})();
</script>
</body>
</html>
