// script.js

// Use window.onload to ensure the DOM is fully loaded
window.onload = function() {

    // find the section for content
    var contentSection = document.getElementById('content')
    // Create a new div element for the card
    var cardDiv;
    var imgDiv;
    var textDiv;
    var buttonDiv;

    // Get the json and make card for each item
    fetch('machines.json')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                cardDiv = document.createElement('div');
                imgDiv = document.createElement('div');
                textDiv = document.createElement('div');
                buttonDiv = document.createElement('div');
                additionalDiv = document.createElement('div');

                
                var imageElement = document.createElement('img');

                // Set class and content for the card
                cardDiv.className = 'machineCard';
                imgDiv.className = 'productImgDiv';
                textDiv.className = 'productDataText';
                buttonDiv.className = 'removeButton';
                additionalDiv.className = "showHideDiv";

                imageElement.className = "productImage";


                
                cardDiv.appendChild(imgDiv);
                cardDiv.appendChild(textDiv);
                cardDiv.appendChild(buttonDiv);
                cardDiv.appendChild(additionalDiv);

                 // Image as the child of the image div
                imgDiv.appendChild(imageElement);
                imageElement.src = 'data:image/png;base64,' + item.image;
                imageElement.alt = 'Red dot';

                // Product data to card
                textDiv.innerHTML = `
                        <h3>${item.model}</h3>
                        <label for='name'>Product name</label><br>
                        <input type="text" id='name' name='name'><br>
                        <label for='location'>Location</label><br>
                        <input type="text" id='location' name='location'><br>`

                // Button to card
                buttonDiv.innerHTML = '<button type = "button">Add</button>';

                // Additional info
                additionalDiv.innerHTML = `
                <p>${item.productNumber}</p>
                <p>${item.type}</p>`;

                // Add card to page
                contentSection.appendChild(cardDiv);
                
            })
    
})
}
