let output = document.getElementById("output");

let studentTabel = document.getElementById("studentTabel");
console.log("script loaded");

document.getElementById("opslaan").addEventListener("click", function (e) {
    e.preventDefault();
    console.log("submit clicked");
    sendData();
});

function success(iets) {
    studentTabel.innerHTML = "";

    let studenten = JSON.parse(iets);
    console.log(studenten);
     
    try { 
        let head = studentTabel.insertRow(0);
        let cellhead = head.insertCell(0)
        let cellhead2 = head.insertCell(1)
        cellhead.innerHTML = "StudentNaam: ";
        cellhead2.innerHTML = "StudentNummer: ";

        for (student in studenten) {
            let row = studentTabel.insertRow(1);
            let cell2 = row.insertCell(0);
            let cell1 = row.insertCell(1);
            cell1.innerHTML = studenten[student].studentNummer;
            cell2.innerHTML = studenten[student].studentNaam;
        }
        console.log("table filled");
    }catch (err) {
        console.log("errr occured" + err);
    }
}

function error(err) {
    console.error('Error Occurred :', err);
}

function sendData() {
    try {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'jsonWrite.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let studentNaam = document.getElementById("studentNaam").value;
        let studentNummer = document.getElementById("studentNummer").value;
        let data = {
            studentNaam: studentNaam,
            studentNummer: studentNummer
        }
        xhr.send(JSON.stringify(data));

        console.log(studentNaam);
        console.log(studentNummer);

        console.log(this.responseText + " database update succesfull");
    }
    catch (e)
    {
        console.log("error updating database " +  e);
    }
    getStudent();
}

function getStudent() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        // In local files, status is 0 upon success in Mozilla Firefox
        if (xhr.readyState === XMLHttpRequest.DONE) {
          const status = xhr.status;
          if (status === 0 || (status >= 200 && status < 400)) {
            // The request has been completed successfully
            success(xhr.responseText);
            console.log(xhr.responseText);
          } else {
            // Oh no! There has been an error with the request!
            error(xhr.responseText);
          }
        }
      };
    xhr.open('GET', 'jsonRead.php', true);
    xhr.send();
}

// Haal initieel al de studenten op die in de database staan
getStudent();

