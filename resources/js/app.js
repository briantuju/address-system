import "./bootstrap";

const menuToggle = document.querySelector(".menu_toggle");
const asideMenu = document.querySelector(".aside_menu");
const addressSelect = document.querySelector(".address_select");
const deleteDocumentForms = document.querySelectorAll(".delete_document");
const deleteAddress = document.querySelector(".delete_address");
const homepageUrl = import.meta.env.VITE_HOMEPAGE;

menuToggle &&
    menuToggle.addEventListener("click", function () {
        if (asideMenu) {
            asideMenu.classList.toggle("hidden");
        }
    });

addressSelect &&
    addressSelect.addEventListener("change", function () {
        const value = this.value;

        if (value === "INVALID") {
            // Go to homepage if not homepage
            return (window.location.href = homepageUrl);
        }

        window.location.href = route("address.show", value);
    });

deleteDocumentForms &&
    deleteDocumentForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            if (confirm("Are you sure?")) {
                form.submit();
            }

            return false;
        });
    });

deleteAddress &&
    deleteAddress.addEventListener("submit", function (e) {
        e.preventDefault();

        if (confirm("Are you sure?")) {
            deleteAddress.submit();
        }

        return false;
    });
