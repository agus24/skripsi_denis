function User() {
    this.data;
    this.html = {
        logout : `<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>`,
        login :
    }
    this.makeLogin = (data) => {
        this.data = data;
        localStorage.setItem('user', JSON.stringify(data));
    }
    this.loggedIn = () => {
        this.data = JSON.parse(localStorage.getItem('user'));
        return this.data != undefined || this.data != null;
    }
    this.expire = () => {
        let date = new Date;
        if(this.data.loginTime - date > 0) {
            localStorage.setItem('user', JSON.stringify({}));
            alert('sesi anda telah berakhir');
        }
    }
}
