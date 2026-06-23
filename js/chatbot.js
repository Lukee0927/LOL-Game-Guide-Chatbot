const messagesEl   = document.getElementById('chat-messages');
const inputEl      = document.getElementById('user-input');
const sendBtn      = document.getElementById('send-btn');
const typingRow    = document.getElementById('typing-row');
const clearBtn     = document.getElementById('clear-btn');
const welcomeBlock = document.getElementById('welcome-block');
const promptChips  = document.querySelectorAll('.prompt-chip');

// ── Helpers ──────────────────────────────────────────────
function getTime() {
    const now = new Date();
    return now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
}

function scrollToBottom() {
    messagesEl.scrollTop = messagesEl.scrollHeight;
}

function autoResize() {
    inputEl.style.height = 'auto';
    inputEl.style.height = Math.min(inputEl.scrollHeight, 140) + 'px';
}

// ── Append a message bubble ──────────────────────────────
function appendMessage(text, isUser) {
    // Hide welcome block on first message
    if (welcomeBlock) welcomeBlock.style.display = 'none';

    const row = document.createElement('div');
    row.className = 'msg-row' + (isUser ? ' user-row' : '');

    const avatarEl = document.createElement('div');
    avatarEl.className = 'msg-avatar ' + (isUser ? 'user-av' : 'bot-av');

    const avatarImg = document.createElement('img');
    avatarImg.src = isUser ? 'images/TeemoProfile.jpg' : 'images/RyzeProfile.jpg';
    avatarImg.alt = isUser ? 'You' : 'League Mentor AI';
    avatarEl.appendChild(avatarImg);

    const bubbleWrap = document.createElement('div');

    const bubble = document.createElement('div');
    bubble.className = 'bubble ' + (isUser ? 'bubble-user' : 'bubble-bot');
    bubble.textContent = text;

    const timeEl = document.createElement('span');
    timeEl.className = 'bubble-time';
    timeEl.textContent = getTime();

    bubbleWrap.appendChild(bubble);
    bubbleWrap.appendChild(timeEl);

    row.appendChild(avatarEl);
    row.appendChild(bubbleWrap);

    // Insert before the typing indicator row
    messagesEl.appendChild(row);
    scrollToBottom();
}

// ── Show / hide typing indicator ────────────────────────
function showTyping() {
    typingRow.style.display = 'flex';
    // Move typing row to after all messages visually via scrolling
    messagesEl.appendChild(typingRow); // re-append to keep at bottom within messages
    scrollToBottom();
}

function hideTyping() {
    typingRow.style.display = 'none';
}

// ── Send message ─────────────────────────────────────────
async function sendMessage() {
    const raw = inputEl.value.trim();
    if (!raw) return;

    appendMessage(raw, true);
    inputEl.value = '';
    inputEl.style.height = 'auto';
    sendBtn.disabled = true;

    showTyping();

    try {
        const formData = new FormData();
        formData.append('message', raw);

        const response = await fetch('messageHandler.php', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Server returned ' + response.status);
        }

        const data = await response.json();

        // Small delay so typing indicator feels natural
        await new Promise(r => setTimeout(r, 600));

        hideTyping();
        appendMessage(data.reply || "Sorry, I received an unexpected response.", false);

    } catch (err) {
        hideTyping();
        appendMessage("⚠ I couldn't connect to the knowledge base right now. Please check the server connection.", false);
        console.error('Chat error:', err);
    } finally {
        sendBtn.disabled = false;
        inputEl.focus();
    }
}

// ── Event listeners ───────────────────────────────────────
sendBtn.addEventListener('click', sendMessage);

inputEl.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
});

inputEl.addEventListener('input', autoResize);

// Prompt chips
promptChips.forEach(chip => {
    chip.addEventListener('click', () => {
        inputEl.value = chip.dataset.prompt;
        autoResize();
        sendMessage();
    });
});

// Clear button
clearBtn.addEventListener('click', () => {
    // Remove all message rows (keep typing row)
    const rows = messagesEl.querySelectorAll('.msg-row:not(#typing-row)');
    rows.forEach(r => r.remove());

    // Re-show welcome block
    if (welcomeBlock) welcomeBlock.style.display = 'block';
    hideTyping();
    inputEl.focus();
});

// Initial focus
inputEl.focus();