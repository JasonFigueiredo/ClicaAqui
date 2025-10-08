const themeToggle = document.getElementById('themeToggle');
const html = document.documentElement;
const icon = themeToggle.querySelector('.icon');

const currentTheme = localStorage.getItem('theme') || 'light';
html.setAttribute('data-theme', currentTheme);
icon.textContent = currentTheme === 'light' ? '🌙' : '☀️';

themeToggle.addEventListener('click', () => {
    const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    icon.textContent = newTheme === 'light' ? '🌙' : '☀️';
});

// Controle de hover do botão e placeholder baseado no input
const urlInput = document.querySelector('.input');
const button = document.querySelector('.button');

const toggleButtonState = () => {
    const hasContent = urlInput.value.trim();
    button.classList.toggle('disabled', !hasContent);
    urlInput.classList.toggle('has-content', hasContent);
};

urlInput.addEventListener('input', toggleButtonState);
toggleButtonState();

// Função para copiar o link
function copyLink() {
    const copyInput = document.querySelector('.copy-input');
    const copyBtn = document.querySelector('.copy-btn');
    
    if (copyInput && copyInput.value) {
        copyInput.select();
        copyInput.setSelectionRange(0, 99999);
        
        navigator.clipboard.writeText(copyInput.value).then(() => {
            // Feedback visual
            const originalContent = copyBtn.innerHTML;
            copyBtn.innerHTML = '✓';
            copyBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
            
            setTimeout(() => {
                copyBtn.innerHTML = originalContent;
                copyBtn.style.background = '';
            }, 1500);
        }).catch(() => {
            // Fallback para navegadores antigos
            document.execCommand('copy');
        });
    }
}