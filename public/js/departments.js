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
        
        app.removeOptions(departmentSelect);
        departmentSelect.innerHTML = '<option>Choisissez un département</option>'
        const idCountry = document.getElementById('city_country').value;
            let fetchOptions = {
            method: 'GET',
            mode:   'cors',
            cache:  'no-cache'
        };
        fetch('http://localhost:8080/back/city/ajax/departments/country/' + idCountry, fetchOptions)
            .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            return Promise.reject(response);
        }).then(function (data) {
            console.log(data);
            for(key in data){
                let department = data[key];
                console.log(department);
                let option = document.createElement('option');
                option.value = department.id;
                option.text = department.name;
                departmentSelect.append(option);
            }
            
        }).catch(function (error) {
            console.log("le message d'erreur", error);
        });
            
        departmentSelect.classList.remove('d-none');
        const label = document.querySelector('.department_label')
        label.classList.remove('d-none')
    },

    //Source: https://prograide.com/pregunta/37784/comment-effacer-toutes-les-options-dune-liste-deroulante
    // using the function: removeOptions(document.getElementById('DropList'));
    removeOptions: function (selectElement) 
    { 
        var i, L = selectElement.options.length - 1; 
        for(i = L; i >= 0; i--) 
        { 
            selectElement.remove(i); 
        } 

    } 




/*     handleChangeUser:function(evt)
    {
        const departementSelect = document.getElementById('city_department');
        departementSelect.classList.remove('d-none');
        const label = document.querySelector('.department_label')
        label.classList.remove('d-none')
    }  */
    

    

} 

app.init();