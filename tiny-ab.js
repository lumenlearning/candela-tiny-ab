let tinyABinit = () => {
  const contentOriginal = document.getElementsByClassName('ab-test-original');
  const contentAlt = document.getElementsByClassName('ab-test-alternative');
  const urlParams = new URLSearchParams(window.location.search);
  const testCriteria = (contentAlt.length > 0) && (urlParams.has('lti_context_id'));

  if (testCriteria) {
    const id = urlParams.get('lti_context_id');
    addCSS();
    runTinyAB(contentOriginal, contentAlt, id);
  }
}

let addCSS = () => {
  const style = document.createElement('style');
  style.innerHTML = `
    .ab-test-original+.ab-test-alternative { display: none; }
  `;
  document.head.appendChild(style);
}

let runTinyAB = (contentOriginal, contentAlt, id) => {
  const lastChar = id.slice(-1);
  const altChars = ['1', '3', '5', '7', '9', 'b', 'd', 'f'];
  const showAlt = altChars.includes(lastChar);

  showAlt ? (
    Array.from(contentOriginal).forEach(original => {
      original.remove();
    }),
    Array.from(contentAlt).forEach(alt => {
      alt.style.display = 'block';
    })
  ) : (
    Array.from(contentAlt).forEach(alt => {
      alt.remove();
    })
  );
}

tinyABinit();
