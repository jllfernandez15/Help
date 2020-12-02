
export class Paged {

    page: number;
    pageSize: number;
    orderField: string;
    orderType: string;

    public getPage(): number {
        return this.page;
    }
    public setPage(p: number): void {
        this.page = p;
    }
}