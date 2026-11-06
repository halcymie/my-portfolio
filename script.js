// ===== 1. SCROLL ANIMATION =====
// when something with the class "reveal" appears on the screen,
// we add the class "show" so it slides up (the animation is in style.css)
var revealItems = document.querySelectorAll(".reveal");

var observer = new IntersectionObserver(function (entries) {
    for (var i = 0; i < entries.length; i++) {
        if (entries[i].isIntersecting) {
            entries[i].target.classList.add("show");
        }
    }
}, { threshold: 0.1 });

for (var r = 0; r < revealItems.length; r++) {
    observer.observe(revealItems[r]);
}


// ===== 2. THE BIG "HELLO" CHANGES LANGUAGE =====
var helloWord = document.getElementById("helloWord");
var helloLang = document.getElementById("helloLang");
var current = 0;   // which greeting is showing now

// every 3 seconds: fade out, change the word, fade in
setInterval(function () {
    helloWord.classList.add("out");
    helloLang.classList.add("out");

    setTimeout(function () {
        current = current + 1;
        if (current == greetings.length) {
            current = 0;   // go back to the first word
        }

        helloWord.textContent = greetings[current][0];
        helloLang.textContent = greetings[current][1];

        helloWord.classList.remove("out");
        helloLang.classList.remove("out");
    }, 500);
}, 3000);


// ===== 3. ALL WORKS BUTTONS (filter) =====
var filterButtons = document.querySelectorAll(".filters button");
var gridCards = document.querySelectorAll("#projectGrid .card");

for (var f = 0; f < filterButtons.length; f++) {
    filterButtons[f].addEventListener("click", filterWorks);
}

function filterWorks() {
    // "this" is the button that was clicked
    var chosen = this.getAttribute("data-filter");

    // only the clicked button is active
    for (var i = 0; i < filterButtons.length; i++) {
        filterButtons[i].classList.remove("active");
    }
    this.classList.add("active");

    // show the cards with the same category, hide the others
    for (var j = 0; j < gridCards.length; j++) {
        var category = gridCards[j].getAttribute("data-category");

        if (chosen == "All" || category == chosen) {
            gridCards[j].classList.remove("hidden");
        } else {
            gridCards[j].classList.add("hidden");
        }
    }
}


// ===== 4. DARK MODE =====
document.getElementById("themeToggle").addEventListener("click", function () {
    var page = document.documentElement;
    page.classList.toggle("dark");

    // save my choice so it stays after reloading the page
    if (page.classList.contains("dark")) {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
});


// ===== 5. EMAIL POPUP =====
var emailModal = document.getElementById("emailModal");
var copyButton = document.getElementById("copyEmail");

function openEmail() {
    emailModal.classList.add("open");
    document.body.classList.add("modal-open");   // the page behind can't scroll
}

function closeEmail() {
    emailModal.classList.remove("open");
    document.body.classList.remove("modal-open");
}

document.getElementById("emailBtn").addEventListener("click", openEmail);
document.getElementById("emailClose").addEventListener("click", closeEmail);

// clicking the dark area outside the box also closes it
emailModal.addEventListener("click", function (event) {
    if (event.target == emailModal) {
        closeEmail();
    }
});

// copy the email, and show "COPIED!" for 2 seconds
copyButton.addEventListener("click", function () {
    var email = document.getElementById("modalEmail").textContent;
    navigator.clipboard.writeText(email);

    copyButton.textContent = "COPIED!";
    setTimeout(function () {
        copyButton.textContent = "COPY EMAIL";
    }, 2000);
});


// ===== 6. PROJECT POPUP =====
var workModal = document.getElementById("workModal");
var workMedia = document.getElementById("workMedia");
var allCards = document.querySelectorAll(".card");

for (var k = 0; k < allCards.length; k++) {
    allCards[k].addEventListener("click", openWork);
}

function openWork() {
    // "this" is the card that was clicked
    // its first child is the picture or the video, so we copy it into the popup
    workMedia.innerHTML = "";
    workMedia.appendChild(this.firstElementChild.cloneNode(true));

    document.getElementById("workTitle").textContent = this.querySelector("h3").textContent;
    document.getElementById("workDesc").textContent = this.querySelector("p").textContent;
    document.getElementById("workMeta").textContent = this.getAttribute("data-category").toUpperCase() + " / " + this.querySelector("small").textContent;

    workModal.classList.add("open");
    document.body.classList.add("modal-open");
}

function closeWork() {
    workModal.classList.remove("open");
    document.body.classList.remove("modal-open");
    workMedia.innerHTML = "";   // also stops the video
}

document.getElementById("workClose").addEventListener("click", closeWork);

workModal.addEventListener("click", function (event) {
    if (event.target == workModal) {
        closeWork();
    }
});


// ===== 7. ESCAPE KEY closes any popup =====
document.addEventListener("keydown", function (event) {
    if (event.key == "Escape") {
        closeEmail();
        closeWork();
    }
});