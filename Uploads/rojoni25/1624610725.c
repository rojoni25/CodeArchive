#include <stdio.h>
void main()
{
    int i,n,a,b;
    printf("Enter the value of n:\t");
    scanf("%d",&n);
    n=n+'A';
    for (i='A';i<=n;i++)
        {for (a=n-1;a>=i;a--)
        printf(" ");
        for (b='A';b<i;b++)
            {printf("%c ",b);}
            printf("\n");

    }
}
