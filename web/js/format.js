(function() {
  Errors();
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
    if (element) {
      let count = 0;
      return element.addEventListener("keypress", function() {
        count++;

        if (count !== 0 && count % 2) {
          element.value += " ";
        }
      });
    } else {
      throw new Error(
        "[ FORMAT_INPUT_NUMBER_ERROR ]: Selected element is " + typeof element
      );
    }
  }

  function Errors() {
    const EMAIL_INPUTS = document.querySelectorAll('input[type="email"]');
    const TEXT_INPUTS = document.querySelectorAll('input[type="text"]');
    const PASSWORD_INPUTS = document.querySelectorAll('input[type="password"]');

    const FIELDS = document.querySelectorAll(".field");

    for (var i = 0; i < EMAIL_INPUTS.length; i++) {
      const EMAIL_INPUT = EMAIL_INPUTS[i];
      const FIELD = FIELDS[i];

      EMAIL_INPUT.addEventListener("change", () => {
        this.emailValidation(FIELD);
      });
    }

    for (var i = 0; i < PASSWORD_INPUTS.length; i++) {
      const PASSWORD_INPUT = PASSWORD_INPUTS[i];
      const PASSWORD_FIELDS = document.querySelectorAll(".password_field");
      const PASSWORD_FIELD = PASSWORD_FIELDS[i];

      PASSWORD_INPUT.addEventListener("change", () => {
        this.passwordValidation(PASSWORD_FIELD, PASSWORD_INPUTS);
      });
    }

    this.passwordValidation = function(parent, elements) {
      const PASSWORDS = elements;
      const ERROR_LABEL = parent.querySelector(".errorLabel");

      for (var i = 0; i < PASSWORDS.length; i++) {
        const PASSWORD = PASSWORDS[i];
        if (PASSWORD.value.length < 6) {
          this.setMessage(ERROR_LABEL, "Le mot de passe est trop court");
          updateUI("ERROR", parent);
          break;
        } else {
          this.setMessage(ERROR_LABEL, "");
          updateUI("SUCCESS", parent);
          break;
        }

        if (PASSWORD[1] && PASSWORD[0 !== PASSWORD[1]]) {
          for (var j = 0; j < ERROR_LABEL.length; j++) {
            this.setMessage(ERROR_LABEL[j], "not the same");
          }
          updateUI("ERROR", parent);
          break;
        }
      }
    };

    this.emailValidation = function(element) {
      const ERROR_LABEL = element.querySelector(".errorLabel");
      const INPUT = element.querySelector('input[type="email"]');

      if (!this.validateEmail(INPUT.value)) {
        this.setMessage(ERROR_LABEL, "Il ne s'agit pas d'un email valide");
        element.classList.remove("field");
        element.classList.add("field--error");
      } else {
        this.setMessage(ERROR_LABEL, "");
        element.classList.add("field");
        element.classList.remove("field--error");
      }
    };

    this.validateEmail = function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    };

    this.setMessage = function(errorLabel, message) {
      errorLabel.innerHTML = message;
    };
  }

  function updateUI(type, element) {
    if (type === "ERROR") {
      element.classList.remove("field");
      element.classList.remove("password_field");
      element.classList.add("field--error");
    }
    if (type === "SUCCESS") {
      element.classList.add("field");
      element.classList.add("password_field");
      element.classList.remove("field--error");
    }
  }

  function validatePassword(password, confirmPassword) {
    return password === confirmPassword;
  }
})();
