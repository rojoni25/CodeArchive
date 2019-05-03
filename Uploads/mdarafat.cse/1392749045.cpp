#include <iostream>
#include<cstdlib>
#include<cmath>
#include <algorithm>
#include<windows.h>
#define CTTL SetConsoleTitle("RSA En & De by Mofakhkherul Islam")
using namespace std;

int mpow(int base, int exp)             /// Normal pow() function does not work for data integrity
{
    int result = 1;
    while (exp)
    {
        if (exp & 1)
            result *= base;
        exp >>= 1;
        base *= base;
    }
    return result;
}

int ompow(int base, int exp, int n)
{
    int result=1,count=0,mval=1;
    count =exp/2;
    for(int i = 0; i<count; i++)
    {
        mval = mpow(base,2)%n;
        result = (result*mval)%n;
    }
    result *= base%n;
    return result;
}

int main()
{
    CTTL;
    long long  p,q,e,n,d,fin,M,C,M2,i=1,j;
    bool prime=false;

    while(!prime)
    {
        cout<<"Enter p: ";
        cin>>p;
        for(i=2; i<p; i++)
        {
            prime=true;
            if(p%i==0)
            {
                prime=false;
                break;
            }
        }
        if(i>=2 && !prime)
        {
            cout<<"Invalid Prime Number: "<<endl;
        }
        else if(prime)
        {
            break;
        }
    }
    prime=false;
    while(!prime)
    {
        cout<<"Enter q: ";
        cin>>q;
        for(i=2; i<q; i++)
        {
            prime=true;
            if(q%i==0)
            {
                prime=false;
                break;
            }
        }

        if(i>=2 && !prime)
        {
            cout<<"Invalid Prime Number: "<<endl;
        }
        else if(prime)
        {
            break;
        }
    }
    n=p*q;
    fin=(p-1)*(q-1);

    cout<<"Enter e(*Must be less than"<<fin<<"): ";
    cin>>e;
    if(e<fin)
    {
        if(__gcd(fin,e)!=1)
        {
            cout<<e<<" Can't be used as e....\nCalculating new e.....\n";
            for(i=e; i<fin; i++)
            {
                if(__gcd(i,fin)==1)
                {
                    e=i;
                    cout<<"New possible e: "<<e<<endl;
                    break;
                }
            }
        }
    }
    for(i=1; i>0; i++)
    {
        if((fin*i+1)%e==0)
        {
            d = (fin*i+1)/e;
            break;
        }
    }
    cout<<"Calculated d: "<<d<<endl;
    cout<<"Enter M: ";
    cin>>M;

    if(e%2==0)
        C = (ompow(M,d,n)*M%n)%n;
    else
        C = (((ompow(M,e,n)%n)));
    cout<<"Encrypted Message: "<<C<<endl;

    if(d%2==0)
        M2 = (ompow(C,d,n)*C%n)%n;
    else
        M2 = (((ompow(C,d,n)%n)));
    cout<<"Decrypted Message: "<<M2<<endl;
    return 0;
}
