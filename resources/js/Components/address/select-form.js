// Get DOM elements
const addressSelect = document.querySelector(".address_select");

const homepageUrl = import.meta.env.VITE_HOMEPAGE;
const addressRoute = window.routes?.address;

addressSelect &&
    addressSelect.addEventListener("change", function () {
        const value = this.value;

        if (value === "INVALID") {
            // Go to homepage if not homepage
            return (window.location.href = homepageUrl);
        }

        window.location.href = addressRoute + "/" + value;
    });
