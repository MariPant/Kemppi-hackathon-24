// script.js

// Use window.onload to ensure the DOM is fully loaded
window.onload = function() {
    var contentSection = document.getElementById('content');

    fetch('json/machines.json')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                var cardDiv = document.createElement('div');
                var imgDiv = document.createElement('div');
                var textDiv = document.createElement('div');
                var buttonDiv = document.createElement('div');
                var additionalDiv = document.createElement('div');
                var imageElement = document.createElement('img');

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

                imgDiv.appendChild(imageElement);
                imageElement.src = 'data:image/png;base64,' + item.image;
                imageElement.alt = 'Red dot';

                textDiv.innerHTML = `
                        <h3>${item.model}</h3>
                        <p>${item.name}</p>
                        <p>${item.location}</p>`;

                buttonDiv.innerHTML = '<button type="button">Remove</button>';

                additionalDiv.innerHTML = `
                <p>${item.productNumber}</p>
                <p>${item.type}</p>`;

                contentSection.appendChild(cardDiv);
            })
        })
}
