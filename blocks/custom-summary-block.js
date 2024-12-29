document.addEventListener('DOMContentLoaded', function () {
    var summaryList = document.getElementById('summary-list');
    var headings = document.querySelectorAll('h2');
    if (summaryList) {
        headings.forEach(function(heading, index) {
            var listItem = document.createElement('li');
            listItem.innerHTML = '<a href="#heading-' + index + '">' + heading.textContent + '</a>';
            summaryList.appendChild(listItem);
            heading.setAttribute('id', 'heading-' + index);
        });

        summaryList.addEventListener('click', function(e) {
            if (e.target.tagName === 'A') {
                e.preventDefault();
                var targetId = e.target.getAttribute('href').substring(1);
                document.getElementById(targetId).scrollIntoView({ behavior: 'smooth' });
            }
        });
    }
});
