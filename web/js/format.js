(function() {
  Actions().element ? Actions().resolve(Actions().element) : null;

  function Actions() {
    return {
      element: document.querySelector('input[type="tel"]'),
      resolve: input => {
        FormatToPhone(input);
      }
    };
  }

  // TODO: Rename function name.
  function FormatToPhone(element = x => x) {
    let count = 0;
    return element.addEventListener("keypress", function() {
      count++;

      if (count !== 0 && count % 2) {
        element.value += " ";
      }
    });
  }
})();
