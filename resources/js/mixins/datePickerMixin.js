import  format  from 'date-fns';

export const datePickerMixin = {
    data: function() {
        return  {
            dateFormat: 'D MMM',
            buttonDateOne: '',
            buttonDateTwo: '',
        }
    },
    methods: {
        formatDates(dateOne, dateTwo) {
            let formattedDates = '';
            if (dateOne) {
                formattedDates = format.format(dateOne, this.dateFormat);
            }
            if (dateTwo) {
                formattedDates += ' - ' + format.format(dateTwo, this.dateFormat);
            }
            return formattedDates;
        },
        onCancel() {
            //this.addMessage(`Warning, select closed!`);
        },
        onMonthChange(dates) {
            this.addMessage(`Warning, month changed to ${format.format(dates, 'MMM YYYY')}!`);
        }
    }
}