const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");
const cards = document.querySelectorAll('.sales, .expenses, .income');
const headerText = document.querySelector('.recent-orders h2');
const tables = {
    'Ganado comercial': document.querySelector('.table.ganado-comercial'),
    'Ganado genético': document.querySelector('.table.ganado-genetico'),
    'Ganado en subasta': document.querySelector('.table.ganado-subasta')
};


menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

cards.forEach(card => {
    card.addEventListener('click', () => {
        cards.forEach(c => c.classList.remove('active-card'));
        card.classList.add('active-card');

        const cardTitle = card.querySelector('h3').textContent;
        headerText.textContent = cardTitle;

        Object.values(tables).forEach(table => table.style.display = 'none');
        if (tables[cardTitle]) tables[cardTitle].style.display = 'table';
    });
});
