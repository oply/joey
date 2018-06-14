(function() {
  this.initialState = {};

  const self = this;

  const FORM = document.querySelector("form.formData");
  const INPUTS = document.querySelectorAll("form.formData input");

  for (var i = 0; i < INPUTS.length; i++) {
    const INPUT = INPUTS[i];
    const INPUT_NAME = INPUT.getAttribute("name");

    INPUT.addEventListener("keyup", function() {
      self.initialState = {
        ...self.initialState,
        [INPUT_NAME]: INPUT.value
      };
    });
  }

  FORM.addEventListener("submit", function(event) {
    event.preventDefault();

    // Temporary workaround: Waiting for the API routes name.
    if (FORM.name === "LOGIN") {
      // axios.post('/login', self.initialState)
    }

    if (FORM.name === "SIGNUP") {
      // axios.post('/signup', self.initialState)
    }
  });
})();
