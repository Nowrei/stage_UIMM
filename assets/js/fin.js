flatpickr("#datepicker", {
  dateFormat: "d-m-Y",
  locale: {
    months: {
      shorthand: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
      longhand: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
    },
    weekdays: {
      shorthand: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
      longhand: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
    },
    firstDayOfWeek: 1,
    rangeSeparator: ' - ',
    weekAbbreviation: 'Sem',
    scrollTitle: 'Défiler pour augmenter la valeur',
    toggleTitle: 'Cliquer pour basculer',
  },
  onClose: function(selectedDates, dateStr, instance) {
    instance.close();
  },
});