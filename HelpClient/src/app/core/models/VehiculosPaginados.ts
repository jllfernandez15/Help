import { PagedRequest } from './common/paged/PagedRequest';
import { Vehiculo } from './Vehiculo';

export class VehiculosPaginados extends PagedRequest {
    
    private vehiculo: Vehiculo;

    public getVehiculo(): Vehiculo {
        return this.vehiculo;
    }

    public setVehiculo(vehiculo: Vehiculo): void {
        this.vehiculo = vehiculo;
    }

}