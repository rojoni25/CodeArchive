#include <stdio.h>
void main()
{
    float x,y,z;
    printf("Enter first number");
    scanf("%f",&x);
    printf("Enter second number");
    scanf("%f",&y);
     printf("Enter third number");
    scanf("%f",&z);
    if (x>y & x>z)
        printf("%1f is greater than %1f and %1f",x,y,z);
    else if (y>x & y>=z)
        printf("%1f is greater than %1f and %1f",y,x,z);
    else if (z>x & z>y)
        printf("%1f is greater than %1f and %1f",z,x,y);
    else
        printf("%1f = %1f = %1f",x,y,z);
}

