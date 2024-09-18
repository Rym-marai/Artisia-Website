 function validateForm(event) {
        var nom = document.getElementById("nom");
        var prenom = document.getElementById("prenom");
        var tel = document.getElementById("tel");
        var mail = document.getElementById("mail");
        var event1 = document.getElementById("event1");
        var event2 = document.getElementById("event2");
        var event3 = document.getElementById("event3");

        // Regular expressions for validation
        var nameRegex = /^[a-zA-ZÀ-ÿ\s]*$/;
        var telRegex = /^[0-9]{2}-[0-9]{3}-[0-9]{3}$/;
        var emailRegex = /^[a-zA-Z0-9._%+-]+@(?:gmail|yahoo|hotmail|outlook)\.(?:com|tn|fr)$/;

        // Check each field and display error message if validation fails
        if (!nom.value.match(nameRegex)) {
            nom.setCustomValidity("Nom invalide. Veuillez saisir uniquement des lettres.");
            return false;
        } else {
            nom.setCustomValidity("");
        }

        if (!prenom.value.match(nameRegex)) {
            prenom.setCustomValidity("Prénom invalide. Veuillez saisir uniquement des lettres.");
            return false;
        } else {
            prenom.setCustomValidity("");
        }

        if (!tel.value.match(telRegex)) {
            tel.setCustomValidity("Numéro de téléphone invalide. Veuillez saisir un numéro valide au format 2-3-3.");
            return false;
        } else {
            tel.setCustomValidity("");
        }

        if (!mail.value.match(emailRegex)) {
            mail.setCustomValidity("Adresse e-mail invalide. Veuillez saisir une adresse e-mail valide.");
            return false;
        } else {
            mail.setCustomValidity("");
        }

        // Check if at least one event is checked
        if (!event1.checked && !event2.checked && !event3.checked) {
            alert("Veuillez sélectionner au moins un événement.");
            event.preventDefault();
            return false;
        }

        return true;
    }

