import "./bootstrap";

import "toastify-js/src/toastify.css";
import Toastify from "toastify-js";

window.addEventListener("Toastify", (event) => {
    let data = event.detail;
    Toastify({
        text: data.message,
        duration: 3000,
        position: "right",
        close: true,
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background:
                data.status === "success"
                    ? "#228B22"
                    : data.status === "info"
                    ? "#40E0D0"
                    : data.status === "error"
                    ? "#8B0000"
                    : "#000000",
        },
        onClick: function () {}, // Callback after click
    }).showToast();
});
