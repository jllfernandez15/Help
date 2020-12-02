//import { Father } from './Father';
//import { tokenKey } from '@angular/core/src/view';

export class Token {
    public access_token: string;
    

    static fill(tok: string): Token{
      let token = new Token();
      token.access_token = tok;
      return token;
    }
  }