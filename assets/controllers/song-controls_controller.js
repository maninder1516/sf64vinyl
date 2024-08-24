import { Controller } from '@hotwired/stimulus';
import axios from 'axios';


/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static values = {
        infoUrl: String
    }

    // connect() {
    //     console.log('Stimulus controller!');
    // }

    play(event) {
        event.preventDefault();

        //console.log('Playing  sound');
        //console.log(this.infoUrlvalue)
        axios.get(this.infoUrlValue)
            .then((response) => {
                console.log(response);
                const audio = new Audio(response.data.url);
                audio.play();
            });
    } 
}
