// ── Floating Chatbot for Guides Page ─────────────────────────
const floatBtn    = document.getElementById('float-chat-btn');
const floatPanel  = document.getElementById('float-chat-panel');
const floatClose  = document.getElementById('float-chat-close');
const floatInput  = document.getElementById('float-input');
const floatSend   = document.getElementById('float-send-btn');
const floatMsgs   = document.getElementById('float-messages');
const floatTyping = document.getElementById('float-typing');

function togglePanel() {
    floatPanel.classList.toggle('open');
    if (floatPanel.classList.contains('open')) {
        floatInput.focus();
    }
}

floatBtn.addEventListener('click', togglePanel);
floatClose.addEventListener('click', () => floatPanel.classList.remove('open'));

function appendFloatMsg(text, isUser) {
    // Remove welcome msg on first real exchange
    const welcome = floatMsgs.querySelector('.float-welcome');
    if (welcome) welcome.remove();

    const el = document.createElement('div');
    el.className = 'float-msg ' + (isUser ? 'user' : 'bot');
    el.textContent = text;
    floatMsgs.appendChild(el);
    floatMsgs.scrollTop = floatMsgs.scrollHeight;
}

async function floatSendMsg() {
    const raw = floatInput.value.trim();
    if (!raw) return;

    appendFloatMsg(raw, true);
    floatInput.value = '';
    floatSend.disabled = true;
    floatTyping.style.display = 'flex';

    try {
        const fd = new FormData();
        fd.append('message', raw);
        const res = await fetch('messageHandler.php', { method: 'POST', body: fd });
        const data = await res.json();

        await new Promise(r => setTimeout(r, 500));
        floatTyping.style.display = 'none';
        appendFloatMsg(data.reply || 'Sorry, unexpected response.', false);
    } catch (err) {
        floatTyping.style.display = 'none';
        appendFloatMsg('⚠ Could not connect. Try the full chat page.', false);
    } finally {
        floatSend.disabled = false;
        floatInput.focus();
    }
}

floatSend.addEventListener('click', floatSendMsg);
floatInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') { e.preventDefault(); floatSendMsg(); }
});
