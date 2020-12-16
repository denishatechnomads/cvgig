import ExampleComponent from "./components/ExampleComponent";
import NotFound from "./components/NotFound";


export const routes = [
    { path: '*', component: NotFound },
    { path: '/', name: '', component: ExampleComponent },
    { path: '/home', name: 'home', component: ExampleComponent },
];

