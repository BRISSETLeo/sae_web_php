class Connexion {

    constructor() {
        this.nameInput = document.getElementById('nom-utilisateur');
        this.passwordInput = document.getElementById('mot-de-passe');
    }

    pressButton(e) {
        if (e.key === 'Enter') {
            this.sendData();
        }

    }

    sendData() {
        const self = this;
        $.ajax({
            url: './_inc/methodes/meConnecter.php',
            type: 'POST',
            data: {
                username: this.nameInput.value,
                password: this.passwordInput.value
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.success) {
                    self._displaySuccess();
                } else {
                    self._displayError(data);
                }
            }
        });
    }

    _displayError(data) {
        document.getElementById('message').textContent = data.message;
        let flash = document.getElementById('flash')
        flash.style.display = 'block';
        var timeout = 3000;
        setTimeout(function () {
            flash.classList.add('suppression');
            setTimeout(function () {
                flash.style.display = 'none';
                flash.classList.remove('suppression');
            }, 500);
        }, timeout);
        console.log(data.message);
    }

    _displaySuccess() {
        window.location.href = './';
    }

}

let connexion = new Connexion();
