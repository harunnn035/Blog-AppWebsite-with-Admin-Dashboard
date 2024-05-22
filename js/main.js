//.............NAV HAMBURGER MENU CLOSE AND OPEN...............//

document.querySelector('.Open').addEventListener('click', () => {
    document.querySelector('.nav-link').style.display = 'flex';
    document.querySelector('.Open').style.display = 'none';
    document.querySelector('.Close').style.display = 'inline-block';
});

document.querySelector('.Close').addEventListener('click', () => {
    document.querySelector('.nav-link').style.display = 'none';
    document.querySelector('.Open').style.display = 'inline-block';
    document.querySelector('.Close').style.display = 'none';
});

    //......................inline...check........................//
document.querySelector('.inline').addEventListener('click',()=>{
document.querySelector('.inline input').classList.toggle('red')   
})
    //......................inline...check........................//

    function validateForm() {
        var ad = document.getElementById("firstNm").value;
        var soyad = document.getElementById("lastNm").value;
        var kullanici = document.getElementById("userNm").value;
        var mail = document.getElementById("email").value;
        var pass = document.getElementById("pass").value;
        var pass2 = document.getElementById("pass2").value;
        var errorMessage = document.getElementById("errorMessage");

        if (ad === "" || soyad === "" || kullanici === "" || mail === "" || pass === "" || pass2 === "") {
            errorMessage.style.display = "block";
            return false; // Formun submit işlemini durdur
        } else {
            errorMessage.style.display = "none";
            return true; // Formun submit işlemine izin ver
        }
    }




    //....................sing-up......................//

    function validateForm() {
        var ad = document.getElementById("firstNm").value.trim();
        var soyad = document.getElementById("lastNm").value.trim();
        var kullanici = document.getElementById("userNm").value.trim();
        var mail = document.getElementById("email").value.trim();
        var pass = document.getElementById("pass").value.trim();
        var pass2 = document.getElementById("pass2").value.trim();  
    
        if (ad === "" || soyad === "" || kullanici === "" || mail === "" || pass === "" || pass2 === "" || pass != pass2) {
            document.getElementById("errorMessage").style.display = "block";
            
            
            return false; // Formun gönderilmesini engelle
            
        }
    
        // Formun doğru şekilde gönderildiğinde giriş sayfasına yönlendir
    alert("Kayıt başarılı giriş yapabilirsiniz..");
        return true;
    
       
        
    }
        //....................sing-up-end......................//