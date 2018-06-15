(function() {
  // Modal opnening
  let count = 0;
  const addClientButton = document.querySelector(".addClientButton");
  const modal = document.querySelector("div.create-client__modal");
  var layout = document.querySelector(".layout");
  var cancelBtn = document.querySelector(".cancel");

  if (addClientButton) {
    addClientButton.addEventListener("click", () => {
      if (count === 3) {
        count = 0;
        for (var i = 0; i < STEPS.length; i++) {
          STEPS[i].classList.remove("create-client__modal-step-active");
        }
      }

      modal.classList.toggle("modalClosed");
      STEPS[0].classList.toggle("create-client__modal-step-active");
      CURRENT_STEPPER[0].classList.add("current");
      layout.classList.toggle("layout__dashboard");
    });

    // Form management

    const STEPS = document.querySelectorAll(".step");
    const ACTION_BUTTON = document.querySelector(".next-step");

    const CURRENT_STEPPER = document.querySelectorAll(".stepper__step");
    const CURRENT_STEPPER_COUNT = document.querySelector(
      ".stepper__step-number"
    );

    const INFOS_ACTION_BUTTON = document.querySelector(
      ".next-step span.btn__inner-text:first-child"
    );
    const ALL_INPUTS = document.querySelectorAll("input");

    ACTION_BUTTON.addEventListener("click", function() {
      console.log(count, "init");
      if (count !== STEPS.length) {
        count++;
        console.log(count, "++");

        if (CURRENT_STEPPER[count]) {
          CURRENT_STEPPER[count].classList.toggle("current");
        }
      }

      if (STEPS[count - 1]) {
        STEPS[count - 1].classList.toggle("create-client__modal-step-active");
      }

      if (STEPS[count]) {
        STEPS[count].classList.toggle("create-client__modal-step-active");
      } else {
        count = 0;
        modal.classList.toggle("modalClosed");
        layout.classList.toggle("layout__dashboard");
        for (var i = 0; i < ALL_INPUTS.length; i++) {
          ALL_INPUTS[i].value = "";
        }

        for (var i = 0; i < CURRENT_STEPPER.length; i++) {
          CURRENT_STEPPER[i].classList.toggle("current");
        }
      }

      INFOS_ACTION_BUTTON.innerHTML = count + 1 + "/3";
    });

    cancelBtn.addEventListener("click", function() {
      count = 0;
      modal.classList.toggle("modalClosed");
      layout.classList.toggle("layout__dashboard");
      for (var i = 0; i < ALL_INPUTS.length; i++) {
        ALL_INPUTS[i].value = "";
      }

      for (var i = 0; i < CURRENT_STEPPER.length; i++) {
        CURRENT_STEPPER[i].classList.remove("current");
      }

      for (var i = 0; i < STEPS.length; i++) {
        STEPS[i].classList.remove("create-client__modal-step-active");
      }
      INFOS_ACTION_BUTTON.innerHTML = count + 1 + "/3";
    });
  }

  const targetPopinAccount = document.querySelector(".open-edit");
  const targetPopinProcess = document.querySelector(".open-process");
  const targetPopinComplementary = document.querySelector(
    ".open-complementary"
  );

  const popinAccount = document.querySelector(".edit__accountInformation");
  const popinProcess = document.querySelector(".edit__process");
  const popinComplementary = document.querySelector(
    ".edit__complementaryInfos"
  );

  const popinAccountCancel = document.querySelector(
    ".edit__accountInformation .cancel"
  );
  const popinProcessCancel = document.querySelector(".edit__process .cancel");
  const popinComplementaryCancel = document.querySelector(
    ".edit__complementaryInfos"
  );

  const layoutDash = document.querySelector(".layout");

  if (targetPopinAccount && targetPopinProcess && targetPopinComplementary) {
    targetPopinAccount.addEventListener("click", function() {
      popinAccount.classList.add("open");
      layoutDash.classList.add("layout__dashboard");
    });

    popinAccountCancel.addEventListener("click", function() {
      popinAccount.classList.remove("open");
      layoutDash.classList.remove("layout__dashboard");
    });

    targetPopinProcess.addEventListener("click", function() {
      popinProcess.classList.add("open");
      layoutDash.classList.add("layout__dashboard");
    });

    popinProcessCancel.addEventListener("click", function() {
      popinProcess.classList.remove("open");
      layoutDash.classList.remove("layout__dashboard");
    });

    targetPopinComplementary.addEventListener("click", function() {
      popinComplementary.classList.add("open");
      layoutDash.classList.add("layout__dashboard");
    });

    popinComplementaryCancel.addEventListener("click", function() {
      popinComplementary.classList.remove("open");
      layoutDash.classList.remove("layout__dashboard");
    });
  }
})();
