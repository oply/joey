(function() {
  // Modal opnening
  count = 0;
  const addClientButton = document.querySelector(".addClientButton");
  const modal = document.querySelector("div.create-client__modal");
  const background = document.querySelector(" .layout__dashboard");

  addClientButton.addEventListener("click", () => {
    console.log(count);
    if (count === 3) {
      count = 0;
      for (var i = 0; i < STEPS.length; i++) {
        STEPS[i].classList.remove("create-client__modal-step-active");
      }
    }

    modal.classList.toggle("modalClosed");
    STEPS[0].classList.toggle("create-client__modal-step-active");

    background.classList.toggle("layout__blur");
  });

  // Form management

  const STEPS = document.querySelectorAll(".step");
  const ACTION_BUTTON = document.querySelector(".create-client__modal-btn");
  const INFOS_ACTION_BUTTON = document.querySelector(
    ".create-client__modal-btn span.btn__inner-text:first-child"
  );

  ACTION_BUTTON.addEventListener("click", function() {
    if (count !== STEPS.length) {
      count++;
      console.log(count, "-------");
    }

    if (STEPS[count - 1]) {
      STEPS[count - 1].classList.toggle("create-client__modal-step-active");
    }

    if (STEPS[count]) {
      STEPS[count].classList.toggle("create-client__modal-step-active");
    } else {
      count = 0;
      modal.classList.toggle("modalClosed");
      background.classList.toggle("layout__blur");
    }

    INFOS_ACTION_BUTTON.innerHTML = count + 1 + "/3";

    console.log(STEPS.length, "STEPS_LENGTH");
  });
})();
