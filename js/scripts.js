

fetch('read.php')
    .then(response => response.json())
    .then(data => {
        // Access the table's tbody element
        const tbody = document.querySelector('#data-table tbody');

       

// Iterate over the data and populate the table
data.forEach(row => {
    const newRow = tbody.insertRow();
    const jobIDCell = newRow.insertCell(0); 
    const nameCell = newRow.insertCell(1);
    const jobTypeCell = newRow.insertCell(2);
    const addressCell = newRow.insertCell(3);
    const salaryCell = newRow.insertCell(4);
    const contactNumberCell = newRow.insertCell(5);
    const actionCell = newRow.insertCell(6);
    const actiondeleteCell = newRow.insertCell(7);

    // Populate the cells with data
    jobIDCell.textContent = row.jobID;
    nameCell.textContent = row.name;
    jobTypeCell.textContent = row.jobType;
    addressCell.textContent = row.address;
    salaryCell.textContent = row.salary;
    contactNumberCell.textContent = row.contactNo;
    
    const editButton = document.createElement('button');
    editButton.textContent = 'Edit';
    editButton.dataset.jobID = row.jobID; // Set jobID as a data attribute
    editButton.addEventListener('click', (event) => {
        const jobID = event.target.dataset.jobID; // Get the jobID from the button's data attribute
        loadEditData(jobID);// Load data for editing using the jobID
        console.log('Clicked Edit for jobID:', jobID);
        window.location.href = `edit.html?jobID=${jobID}`;
    });
    actionCell.appendChild(editButton);

    const deleteButton = document.createElement('button');
deleteButton.textContent = 'Delete';
deleteButton.dataset.jobID = row.jobID; // Set jobID as a data attribute
deleteButton.addEventListener('click', (event) => {
    const jobID = event.target.dataset.jobID; // Get the jobID from the button's data attribute
    console.log('Clicked Edit for jobID:', jobID);
    window.location.href = `table.html`
    // Display a confirmation dialog
    const confirmDelete = confirm(`Are you sure you want to delete jobID ${jobID}?`);
    
    if (confirmDelete) {
        deleteRecord(jobID);
        location.reload();
    }
    
});
actiondeleteCell.appendChild(deleteButton);



});


    })
    .catch(error => {
        console.error('Error fetching data: ' + error);
    });

//-------------------------------------------------------
 // edit code load data

 // Function to get the value of a URL parameter by its jobID
function getURLParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Extract the jobID from the URL
const jobID = getURLParameter('jobID');

// Function to populate the form with data based on jobID
function loadEditData(jobID) {
    // Fetch data based on the jobID
    fetch('getDatabyID.php?jobID=' + jobID)
        .then(response => response.json())
        .then(data => {
            console.log('Retrieved data:', data);
            if (data) {
                // Populate the form fields with data
                document.getElementById('jobID').value = data.jobID;
                document.getElementById('name').value = data.name;
                document.getElementById('jobType').value = data.jobType;
                document.getElementById('address').value = data.address;
                document.getElementById('salary').value = data.salary;
                document.getElementById('contactNo').value = data.contactNo;
                // Populate other form fields as needed
            }
        })
        .catch(error => {
            console.error('Error fetching data: ' + error);
        });
}

// Load data into the form fields when the page loads
loadEditData(jobID);

// edit code submit data


document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('edit-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        const formData = new FormData(form);

        // Send a POST request to the PHP script
        fetch('./updatep.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Log the response from the server
            // You can perform additional actions based on the response if needed
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});


//-----------------------------------------

//delete code
function deleteRecord(jobID) {

    fetch('delete.php?jobID=' + jobID, {
        method: 'DELETE',
    })
    .then(response => {
        if (response.ok) {
            // Successful deletion
            console.log('Deleted jobID:', jobID);
        } else {
            // Handle errors
            console.error('Error deleting jobID:', jobID);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}



 

