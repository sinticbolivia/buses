document.addEventListener("DOMContentLoaded", function (event) {
    var currentIndex = 0;
    var quantityTabs = document.getElementsByClassName("slot-step").length;

    var buttonPrev = document.getElementById("prev-button");
    var buttonNext = document.getElementById("next-button");

    function lastStepF() {
        console.log("the last function was excecuted");
    }
    function changeCurrentIndex(i) {
        if (i < 0 && currentIndex > 0) {
            currentIndex--;
        }
        if (i > 0 && currentIndex == quantityTabs - 1) {
            lastStepF();
        }
        if (i > 0 && currentIndex < quantityTabs - 1) {
            currentIndex++;
        }
    }

    function removeAndAddCssClasses() {
        var slots = document.getElementsByClassName("slot-step");

        for (var i = 0; i < slots.length; i++) {
            slots[i].classList.remove("active");
        }
        slots[currentIndex].classList.add("active");

        var indicators = document.getElementsByClassName("indicator");
        var textIndicators = document.getElementsByClassName("text-indicator");
        var containerIndicators = document.getElementsByClassName(
            "container-indicator"
        );
        var lineIndicators = document.getElementsByClassName("line-indicator");

        for (var i = 0; i < indicators.length; i++) {
            indicators[i].classList.remove("bg-indigo-600");
            indicators[i].classList.remove("border-gray-300");
            indicators[i].classList.remove("border-indigo-600");
            indicators[i].classList.remove("border-gray-300");
            textIndicators[i].classList.remove("text-indigo-600");
            textIndicators[i].classList.remove("text-gray-500");
            containerIndicators[i].classList.remove("text-indigo-600");
            containerIndicators[i].classList.remove("text-gray");
            containerIndicators[i].classList.remove("text-gray-500");
            if (i == currentIndex) {
                indicators[i].classList.add("bg-indigo-600");
                indicators[i].classList.add("border-indigo-600");
                containerIndicators[i].classList.add("text-white");
                textIndicators[i].classList.add("text-indigo-600");
            } else if (i < currentIndex) {
                indicators[i].classList.add("border-indigo-600");
                textIndicators[i].classList.add("text-indigo-600");
                containerIndicators[i].classList.add("text-indigo-600");
            } else if (i > currentIndex) {
                textIndicators[i].classList.add("text-gray-500");
                containerIndicators[i].classList.add("text-gray-500");
            }
        }

        for (var i = 0; i < lineIndicators.length; i++) {
            lineIndicators[i].classList.remove("border-indigo-600");
            lineIndicators[i].classList.remove("border-gray-300");
            if (i < currentIndex) {
                lineIndicators[i].classList.add("border-indigo-600");
            }
        }

        buttonPrev.style.display = "block";
        buttonNext.style.display = "block";

        if (currentIndex == 0) {
            buttonPrev.style.display = "none";
            buttonNext.style.display = "none";
        }
        if (currentIndex == 1) {
            buttonNext.style.display = "none";
        }
    }

    removeAndAddCssClasses();

    document
        .getElementById("prev-button")
        .addEventListener("click", function () {
            changeCurrentIndex(-1);
            removeAndAddCssClasses();
        });

    document
        .getElementById("next-button")
        .addEventListener("click", function () {
            changeCurrentIndex(1);
            removeAndAddCssClasses();
        });

    Livewire.on("setCurrentTrip", (currentTrip, quantitySeats) => {
        changeCurrentIndex(1);
        removeAndAddCssClasses();
    });

    Livewire.on("setCustomerData", (customerData) => {
        changeCurrentIndex(1);
        removeAndAddCssClasses();
    });
});
