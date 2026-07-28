const nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];

function convertText(text) {
    return text.replace(/[0-9]/g, (digit) => nepaliNumbers[digit]);
}

function isCKEditor(node) {
    return node.classList && node.classList.contains('cke_editable');
}

function shouldRemoveNepaliNumbers(node) {
    return node.id === 'engdate';
}

function traverseNodes(node) {
    if (isCKEditor(node)) return;

    if (node.nodeType === Node.TEXT_NODE) {
        if (shouldRemoveNepaliNumbers(node.parentNode)) {
            node.nodeValue = node.nodeValue.replace(/[०-९]/g, '');
        } else if (/\d/.test(node.nodeValue)) {
            node.nodeValue = convertText(node.nodeValue);
        }
    } else if (node.nodeType === Node.ELEMENT_NODE) {
        if (node.tagName === 'INPUT' || node.tagName === 'SELECT') {
            return;
        }
        node.childNodes.forEach(traverseNodes);
    }
}

let timeout;
function throttleTraverse() {
    if (timeout) return;
    timeout = setTimeout(() => {
        traverseNodes(document.body);
        timeout = null;
    }, 100);
}

throttleTraverse();

const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
        mutation.addedNodes.forEach((node) => {
            if (!isCKEditor(node)) {
                throttleTraverse();
            }
        });
        if (mutation.type === 'characterData') {
            if (!isCKEditor(mutation.target.parentNode)) {
                throttleTraverse();
            }
        }
    });
});

document.querySelectorAll('input[type="text"], select').forEach(input => {
    input.addEventListener('input', () => {
    });
});
