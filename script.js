//Require user to check at least one symptom
(function() {
    const form = document.querySelector('#form');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 2 ? checkboxes[2] : null;

    function init() {
        if (firstCheckbox) {
            for (let i = 2; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }
            checkValidity();
        }
    }

    function isChecked() {
        for (let i = 2; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }

        return false;
    }

    function checkValidity() {
        const errorMessage = !isChecked() ? 'Check at least one symptom' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }
    init();
})();

//Alert after updating
function update() {
    var x;
    if (confirm("Data Updated Sucessfully") == true) {
        x = "update";
    }
}

//Avoid checkbox errors
function answer(ans) {
    if (ans == 'none') {
        document.getElementById('fever').checked = false;
        document.getElementById('fatigue').checked = false;
        document.getElementById('muscle').checked = false;
        document.getElementById('diarrhea').checked = false;
        document.getElementById('cough').checked = false;
        document.getElementById('loss').checked = false;
        document.getElementById('sore').checked = false;
        document.getElementById('shortness').checked = false;   
    } else {
        document.getElementById('none').checked = false;
    }
}
                  
                  
                  
                  
                  
                  