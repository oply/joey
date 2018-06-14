const custom_select = document.querySelector("select.custom-select"),
  custom_select_wrapper = document.querySelector("div.custom-select"),
  custom_select_trigger = document.querySelector(".custom-select-trigger"),
  custom_options = document.querySelectorAll(".custom-option");

for (var i = 0; i < custom_options.length; i++) {
  const option = custom_options[i];

  option.addEventListener("click", function() {
    custom_select_trigger.innerHTML = option.textContent;
    custom_select_trigger.setAttribute("data-value", option.textContent);
  });
}

custom_select_wrapper.addEventListener("click", function() {
  custom_select_wrapper.classList.toggle("opened");
});
