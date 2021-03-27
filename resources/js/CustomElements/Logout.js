class LinkLogout extends HTMLElement {
    constructor() {
        super();
        this.inputCsrf = document.createElement("input");
        this.inputCsrf.type = "hidden";
        this.inputCsrf.value = this.getAttribute("csrf");
        this.removeAttribute("csrf");
        this.inputCsrf.name = "_token";
        this.inputMethod = document.createElement("input");
        this.inputMethod.type = "hidden";
        this.inputMethod.value = "POST";
        this.inputMethod.name = "_method";
        this.form = document.createElement("form");
        this.form.method = "post";
        this.form.action = null !== this.getAttribute("action") ? this.getAttribute("action") : `${window.location.origin}/logout`;
        this.removeAttribute("action");
        this.form.setAttribute("style", "display: none");
        this.a = document.createElement("a");
        this.a.classList.add(null !== this.getAttribute("class") ? this.getAttribute("class") : "dropdown-item");
        this.removeAttribute("class");
        null === this.getAttribute("icon") ? (this.a.innerHTML = "Logout") : (this.a.innerHTML = '<i class="fa fa-sign-out-alt"></i>Logout');
        this.removeAttribute("icon");
        this.a.href = "#";
        this.a.addEventListener("click", this.logout.bind(this));
        this.form.appendChild(this.inputCsrf);
        this.form.appendChild(this.inputMethod);
        this.appendChild(this.a);
        this.appendChild(this.form);
    }
    logout(t) {
        t.preventDefault(); this.form.submit();
    }
}
customElements.define("link-logout", LinkLogout);