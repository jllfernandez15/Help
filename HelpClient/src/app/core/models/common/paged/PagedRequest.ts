import { Paged } from './Paged';
//import { Entity } from '../Entity';



export class PagedRequest {
    private paged: Paged;
    //private content: Entity;


    public setPaged(paged: Paged): void {
        this.paged = paged;
    }

    public getPaged(): Paged {
        return this.paged;
    }

}