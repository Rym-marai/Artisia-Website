
    // Function to validate form fields
function validateForm() {
    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var tel = document.getElementById("tel");
    var mail = document.getElementById("mail");
    // Regular expressions for validation
    var nameRegex = /^[a-zA-ZÀ-ÿ\s]*$/;
    var telRegex = /^[0-9]{2}-[0-9]{3}-[0-9]{3}$/;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@(?:gmail|yahoo|hotmail|outlook)\.(?:com|tn|fr)$/;

    // Check each field and display error message if validation fails
    if (!nom.value.match(nameRegex)) {
        nom.setCustomValidity("Nom invalide. Veuillez saisir uniquement des lettres.");
    } else {
        nom.setCustomValidity("");
    }

    if (!prenom.value.match(nameRegex)) {
        prenom.setCustomValidity("Prénom invalide. Veuillez saisir uniquement des lettres.");
    } else {
        prenom.setCustomValidity("");
    }

    if (!tel.value.match(telRegex)) {
        tel.setCustomValidity("Numéro de téléphone invalide. Veuillez saisir un numéro valide au format 2-3-3.");
    } else {
        tel.setCustomValidity("");
    }

    if (!mail.value.match(emailRegex)) {
        mail.setCustomValidity("Adresse e-mail invalide. Veuillez saisir une adresse e-mail valide.");
    } else {
        mail.setCustomValidity("");
    }

    return true;
}

// Function to show the price field when branch and frequency are selected
function showPriceField() {
var branches = document.getElementById("branches").value;
var frequency = document.querySelector('input[name="frequency"]:checked');

var priceLabel = document.getElementById("priceLabel");
var priceField = document.getElementById("price");

if (branches !== "" && frequency) {
priceLabel.style.display = "block";
priceField.style.display = "block";
calculatePrice();
} else {
priceLabel.style.display = "none";
priceField.style.display = "none";
}
}

// Function to calculate price based on branch and frequency
function calculatePrice() {
var branches = document.getElementById("branches").value;
var frequency = document.querySelector('input[name="frequency"]:checked').value;
var priceField = document.getElementById("price");

var price = 0;

// Your price calculation logic based on branch and frequency
// Sample logic:
if (branches === "peinture") {
if (frequency === "everyday") {
price = "100 TND par moins " ;
} else if (frequency === "weekends") {
price = "20 TND ";
} else if (frequency === "per-session") {
price = "10 TND";
}
} else if (branches === "dessin") {
if (frequency === "everyday") {
price = "80 TND par moins " ;
} else if (frequency === "weekends") {
price = "10 TND ";
} else if (frequency === "per-session") {
price = "5 TND";
}
}else if (branches === "sculpture") {
if (frequency === "everyday") {
price = "120 TND par moins " ;
} else if (frequency === "weekends") {
price = "30 TND ";
} else if (frequency === "per-session") {
price = "25 TND";
}
}else if (branches === "gravure") {
if (frequency === "everyday") {
price = "130 TND par moins " ;
} else if (frequency === "weekends") {
price = "40 TND ";
} else if (frequency === "per-session") {
price = "10 TND";
}
}else if (branches === "art-textile") {
if (frequency === "everyday") {
price = "140 TND par moins " ;
} else if (frequency === "weekends") {
price = "30 TND ";
} else if (frequency === "per-session") {
price = "10 TND";
}
}else if (branches === "diy") {
if (frequency === "everyday") {
price = "90 TND par moins " ;
} else if (frequency === "weekends") {
price = "25 TND ";
} else if (frequency === "per-session") {
price = "15 TND";
}
}
priceField.value = price ;

}

