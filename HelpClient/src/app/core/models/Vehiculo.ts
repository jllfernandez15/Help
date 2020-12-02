import { Entity } from './common/Entity';

import { Componente } from './Componente';

export class Vehiculo extends Entity {


  code: string;
  nombre: string;
  componente: Componente;

  public setCode(code: string): void {
    this.code = code;
  }

  public getCode(): string {
    return this.code;
  }

  public setNombre(nombre: string): void {
    this.nombre = nombre;
  }

  public getNombre(): string {
    return this.nombre;
  }

  public setComponente(componente: Componente): void {
    this.componente = componente;
  }

  public getComponente(): Componente {
    return this.componente;
  }


  static fill(v: any): Vehiculo {
    let vehiculo = new Vehiculo();
    vehiculo.setNombre(v.nombre);
    return vehiculo;
  }

}