function getActorsBornOnDate(month, day) {
    // Check if month and day are within valid range
    if (month < 1 || month > 12 || day < 1 || day > 31) {
        // TODO replace alert with different method to report errors
        alert("Invalid month or day. Please provide valid values.")
    }

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener('readystatechange', function () {
        if (this.readyState === this.DONE) {
            if (this.status === 200) {
                // Retrieving all actors' information from the API
                const actorListJSON = JSON.parse(this.responseText)?.data?.list;

                // Only keeping their names and birth years
                let mappedActorsJSON = actorListJSON.map(x => {
                    // TODO may change this format
                    return {
                        "actor_name": x?.nameText?.text,
                        "birth_year": x?.birthDateComponents?.dateComponents?.year
                    };
                });

                // Sorting actors descendingly according to their birth year
                mappedActorsJSON.sort((a, b) => {
                    if ((!a.birth_year && b.birth_year) || a.birth_year < b.birth_year)
                        return 1; // a should come before b in the sorted order
                    if ((!b.birth_year && a.birth_year) || (a.birth_year > b.birth_year))
                        return -1; // b should come before a in the sorted order
                    return 0; // a and b are equivalent
                });

                // TODO change the way the results will be displayed
                // TODO change the way the results will be displayed
                // Get a reference to the modal element
                const myModal = document.getElementById('actor-modal');

// The modal body is where the error description goes
                const modalBody = document.getElementById("actor-modal-body");

                let modalBodyHTML = ``

                for (let actor of mappedActorsJSON)
                {
                    console.log(actor);
                    console.log(actor["actor_name"]);
                    console.log(actor["birth_year"]);
                    modalBodyHTML += `<p style="color: black;">${actor["actor_name"]}: ${actor["birth_year"]}</p>`
                }
                modalBody.innerHTML = modalBodyHTML;

                // Showing the popup
                myModal.classList.add('show');
                myModal.style.display = 'block';
            } else {
                // TODO replace alert with different method to report errors
                alert(`"Request failed with status:", ${this.status}`)
            }
        }
    });

    month = month.toString();
    day = day.toString();

    // The API requires single digit months and days to have a preceding zero (Ex: 09)
    if (month.length === 1)
        month = '0' + month;
    if (day.length === 1)
        day = '0' + day;

    xhr.open('GET', `https://imdb188.p.rapidapi.com/api/v1/getBornOn?month=${month}&day=${day}`);
    xhr.setRequestHeader('X-RapidAPI-Key', 'bc54975f34msh4bd91726f38c25bp13c9f7jsn5fab3d050e09');
    xhr.setRequestHeader('X-RapidAPI-Host', 'imdb188.p.rapidapi.com');

    xhr.send();
}
