// Importation des composants
import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Chart from 'chart.js/auto';

// Configuration Alpine.js
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// Configuration globale de Chart.js
Chart.defaults.font.family = 'Inter, sans-serif';
Chart.defaults.color = '#6B7280';

// Initialisation des composants
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation des tooltips
    const tooltipTriggers = document.querySelectorAll('[data-tooltip]');
    
    tooltipTriggers.forEach(trigger => {
        trigger.addEventListener('mouseenter', showTooltip);
        trigger.addEventListener('mouseleave', hideTooltip);
    });

    // Initialisation des notifications
    const notifications = document.querySelectorAll('.notification');
    
    notifications.forEach(notification => {
        setTimeout(() => {
            notification.remove();
        }, 5000);
    });
});

function showTooltip(event) {
    const tooltipText = this.getAttribute('data-tooltip');
    const tooltip = document.createElement('div');
    
    tooltip.className = 'absolute z-50 px-3 py-2 text-sm text-white bg-gray-900 rounded-lg shadow-lg';
    tooltip.textContent = tooltipText;
    tooltip.style.top = `${this.offsetTop - 40}px`;
    tooltip.style.left = `${this.offsetLeft + this.offsetWidth / 2}px`;
    tooltip.style.transform = 'translateX(-50%)';
    
    this.appendChild(tooltip);
}

function hideTooltip() {
    const tooltip = this.querySelector('div[class*="absolute z-50"]');
    if (tooltip) {
        tooltip.remove();
    }
}