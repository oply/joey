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

  FORM.addEventListener("change", function() {
    if (self.initialState.email && !validateEmail(self.initialState.email)) {
      throw new Error("[ ERRROR ]: Not a valid email");
    }
  });

  FORM.addEventListener("submit", function(event) {
    event.preventDefault();

    if (
      !validatePassword(
        self.initialState.password,
        self.initialState.confirmPassword
      )
    )
      throw new Error("[ ERROR ]: These two passwords are not the same");
    if (FORM.name && FORM.name === "LOGIN") {
      // Temporary workaround: Waiting for the API routes name.
      // axios.post('/login', self.initialState)
    }

    if (FORM.name && FORM.name === "SIGNUP") {
      // axios.post('/signup', self.initialState)
    }
  });

  function validatePassword(password, confirmPassword) {
    return password === confirmPassword;
  }

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
})();
