function login(e,form) {
    e.preventDefault();
    console.log("submitted");
    data = formatFormData($(form).serializeArray());
    console.log(data);

    axios({
      method: 'post',
      url: baseUrl + '/api/login/customer',
      data: data
    }).then(response => {
        let result = response.data.data;
        let date = new Date;
        result['loginTime'] = date.setMinutes(date.getMinutes() + 20);
        user.makeLogin(result);
    }).catch(error => {
        alert('login gagal');
    });
}

function formatFormData(formData) {
    let data = {};
    for(let i = 0 ; i < formData.length ; i++) {
        data[formData[i].name] = formData[i].value;
    }
    return data;
}
