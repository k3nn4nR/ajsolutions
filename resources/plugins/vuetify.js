import 'vuetify/dist/vuetify.min.css'
import es from 'vuetify/es5/locale/es'


import Vue from 'vue'
import Vuetify from 'vuetify'


Vue.use(Vuetify)

const opts = {}

export default new Vuetify({
    opts,
    lang: {
        locales: { es },
        current: 'es',
    },
})