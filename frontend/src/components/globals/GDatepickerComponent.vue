 <template>
    <v-menu :close-on-content-click="false" v-model="menu2" :nudge-right="40" lazy transition="scale-transition" offset-y full-width max-width="290px" min-width="290px">
        <v-text-field slot="activator" v-model="computedDateFormatted" label="Birth Date" persistent-hint prepend-icon="event" readonly></v-text-field>
        <v-date-picker v-model="date" no-title @input="menu2 = false"></v-date-picker>
    </v-menu>
</template>
<script>
import { bus } from "../../main";
export default {
    data: vm => ({
        date: new Date().toISOString().substr(0, 10),
        dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
        menu1: false,
        menu2: false,
    }),

    computed: {
        computedDateFormatted() {
            bus.$emit('date', this.formatDate(this.date));
            return this.formatDate(this.date)

        }
    },
    props: {
        // label: String
        label: "james"
    },

    watch: {
        date(val) {
            this.dateFormatted = this.formatDate(this.date)
        }
    },

    methods: {
        formatDate(date) {
            if (!date) return null

            const [year, month, day] = date.split('-')
            return `${month}/${day}/${year}`
        },
        parseDate(date) {
            if (!date) return null

            const [month, day, year] = date.split('/')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        }

    }
}
</script>