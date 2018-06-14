(function() {
  this.initialState = {};

  const self = this;

  const FORM = document.querySelector("form.formData");
  const INPUTS = document.querySelectorAll("form.formData input");

  if (!FORM.name) {
    throw new Error(
      "[ WARNING ]: Form must provide a name to know wich action call"
    );
  }

  for (var i = 0; i < INPUTS.length; i++) {
    const INPUT = INPUTS[i];
    const INPUT_NAME = INPUT.getAttribute("name");

    if (!INPUT_NAME) {
      throw new Error(
        "[ WARNING ]: Inputs must provide a name, the " + (i + 1) + " does'nt"
      );
    }

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
    if (FORM.name && FORM.name === "LOGIN") {
      // axios.post('/login', self.initialState)
    }

    if (FORM.name && FORM.name === "SIGNUP") {
      // axios.post('/signup', self.initialState)
    }
  });
})();
