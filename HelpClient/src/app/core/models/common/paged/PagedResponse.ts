import { Entity } from '../Entity';

export class PagedResponse { //extends Response {
    content: Entity[];

    total: number;
    page: number;
    pageSize: number;
    totalPages: number;
    
}
