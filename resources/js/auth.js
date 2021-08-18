export function isLoggedIn() {
    return localStorage.getItem("isLoggedIn") == "true";
}

export function logIn() {
    localStorage.setItem("isLoggedIn", true);
}

export function logOut() {
    localStorage.setItem("isLoggedIn", false);
    removeStateToken();
}

export function getStateToken() {
    return localStorage.getItem("userToken");
}
export function setStateToken(token) {
    localStorage.setItem("userToken", token);
}

export function removeStateToken() {
    localStorage.removeItem("userToken");
}

