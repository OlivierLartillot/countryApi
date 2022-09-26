const app = {


    init:function()
    {
        console.log('init: ok');
        const selectCountry = document.getElementById('city_country');
        selectCountry.addEventListener('change',app.handleChangeCountry);
        const departementSelect = document.getElementById('city_department');
        departementSelect.addEventListener('change',app.handleChangeUser);

    },

    handleChangeCountry:function(evt)
    {   
        console.log("je suhandle change country");
        const departmentSelect = document.getElementById('city_department');
        // departmentSelect.innerHTML = '<option>Choisissez un joueur</option>'
        //let none = document.querySelectorAll('.d-none');
        const idCountry = document.getElementById('city_country').value;
/*         let fetchOptions = {
            method: 'GET',
            mode:   'cors',
            cache:  'no-cache'
        };
        fetch('http://localhost:8080/departementsincountry/' + idCountry, fetchOptions)
            .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            return Promise.reject(response);
        }).then(function (data) {
            console.log(data.name);
            for(key in data){
                let d = data[key];
                console.log(d);
                let option = document.createElement('option');
                option.value = d.id;
                option.text = d.firstname;
                departmentSelect.append(option);
            }
            
        }).catch(function (error) {
            console.log("le message d'erreur", error);
        }); */
            
        departmentSelect.classList.remove('d-none');
        const label = document.querySelector('.department_label')
        label.classList.remove('d-none')
    },

/*     handleChangeUser:function(evt)
    {
        const resultSelect = document.getElementById('result_result');
        resultSelect.classList.remove('d-none');
        const label = document.querySelector('.result_label')
        label.classList.remove('d-none')
    } */
    

    

} 

app.init();