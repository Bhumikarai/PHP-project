const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const login = document.querySelector(".login");

sign_up_btn.addEventListener("click", () => {
  login.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  login.classList.remove("sign-up-mode");
});