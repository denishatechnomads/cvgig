import VueProgressBar from 'vue-progressbar';

Vue.use(VueProgressBar, {
    color: '#255F99',
    failedColor: 'red',
    height: '4px',
    transition: {
        speed: '0.4s',
        opacity: '0.6s',
        termination: 300
    },
})
